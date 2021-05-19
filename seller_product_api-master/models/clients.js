const moment = require('moment')
const connection = require('../infra/database/connection')
const repositories = require('../repositories/client')
const { cpf } = require('cpf-cnpj-validator');

class Client {
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

  add(client) {
    const creationDate = moment().format('YYYY-MM-DDTHH:mm:ss')
    const activeOrders = 0
    const query = {
      ...client,
      creationDate,
      activeOrders
    }
    const params = {
      invalidFirstName: {
        name: client.fname.length
      },
      invalidLastName: {
        name: client.lname.length
      },
      invalidAddress: {
        address: client.address
      },
      invalidCPF: {
        cpf: client.CPF
      },
      invalidPassword: {
        password: client.password.length
      }
    }
      const errors = this.validate(params)
      const existError = errors.length
      if (existError) {
        return new Promise((resolve, reject) => reject(errors))
      }
      return repositories.add(query).then(results => {
        const id = results.insertId
        return {
          id,
          ...query
        }
      })
    }

    listAll(){
      return repositories.listAll()
    }

    findOne(id){
      return repositories.findOne(id)
    }

    update(client, id){
      const params = {
        invalidFirstName: {
          name: client.fname.length
        },
        invalidLastName: {
          name: client.lname.length
        },
        invalidAddress: {
          address: client.address
        },
        invalidCPF: {
          cpf: client.CPF
        },
        invalidPassword: {
          password: client.password.length
        }
      }
        const errors = this.validate(params)
        const existError = errors.length
        if (existError) {
          return new Promise((resolve, reject) => reject(errors))
        }
        return repositories.update(client, id).then(results => {
          client.address = JSON.parse(client.address)
          return {id, ...client}
        })
    }

    delete(id) {
      return repositories.delete(id)
    }

  }

module.exports = new Client()
