const moment = require('moment')
const connection = require('../infra/database/connection')
const repositories = require('../repositories/order')
const { cpf } = require('cpf-cnpj-validator');

class Order {
  constructor() {
    this.validatefName = name => name.name >= 5 && name.name <= 15
    this.validatelName = name => name.name >= 5 && name.name <= 15
    this.validateAddress = address => Object.keys(address.address).length == 6
    this.validateCPF = cpfValid => cpf.isValid(cpfValid.cpf);
    this.validatePassword = password => password.password > 5 && password.password < 20

    this.validate = params =>
      this.validation.filter(field => {
        const {
          name
        } = field
        const param = params[name]

        if (params[name] == undefined)
          return null

        return !field.error(param)
      })

    this.validation = [{
        name: "invalidFirstName",
        error: this.validatefName,
        message: "First name should have at least 5 characters and less than 15."
      },
      {
        name: "invalidLastName",
        error: this.validatelName,
        message: "Last name should have at least 5 characters and less than 15."
      },
      {
        name: "invalidAddress",
        error: this.validateAddress,
        message: "All address statements are required."
      },
      {
        name: "invalidCPF",
        error: this.validateCPF,
        message: "Invalid CPF."
      },{
        name: "invalidPassword",
        error: this.validatePassword,
        message: "Password should have at least 5 characters and less than 20."
      },
    ]
  }

  add(order) {
    const creationDate = moment().format('YYYY-MM-DDTHH:mm:ss')
    const query = {
      ...order,
      creationDate,
    }
    const params = {
      invalidFirstName: {
        name: order.clientFirstName.length
      },
      invalidLastName: {
        name: order.clientLastName.length
      },
      invalidAddress: {
        address: order.clientAddress
      },
      invalidCPF: {
        cpf: order.clientCPF
      }
    }
      const errors = this.validate(params)
      const existError = errors.length
      if (existError) {
        return new Promise((resolve, reject) => reject(errors))
      }
      return repositories.add(query).then(results => {
        const items = JSON.parse(query.items)
        const id = items.forEach(response => repositories.burnStock(response.productId))
        return {
          orderId: results[0].insertId,
          ...order
        }
      })
    }

    delete(id) {
      return repositores.delete(id)
    }

    listAll(){
      return repositories.listAll()
    }

    findOne(id){
      return repositories.findOne(id)
    }

    findOneAndDelete(id){
      return repositories.findOne(id).then(order => {
        const items = JSON.parse(order[0].items)
        const productId = items.forEach(items => repositories.cancelProducts(items.productId))
        return repositories.delete(id)
      })
    }

    update(order, id){
      const params = {
        invalidFirstName: {
          name: order.clientFirstName.length
        },
        invalidLastName: {
          name: order.clientLastName.length
        },
        invalidAddress: {
          address: order.clientAddress
        },
        invalidCPF: {
          cpf: order.clientCPF
        }
      }
        const errors = this.validate(params)
        const existError = errors.length
        if (existError) {
          return new Promise((resolve, reject) => reject(errors))
        }
        return repositories.update(order, id).then(results => {
          order.items = JSON.parse(order.items)
          order.clientAddress = JSON.parse(order.clientAddress)
          return {id, ...order}
        })
    }

    delete(id) {
      return repositories.delete(id)
    }

  }

module.exports = new Order()
