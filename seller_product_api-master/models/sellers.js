const moment = require('moment')
const connection = require('../infra/database/connection')
const repositories = require('../repositories/seller')

class Seller {
  constructor() {
    this.validateName = name => name.name >= 5 && name.name <= 50
    this.validateComission = comission => comission.comission > 1 && comission.comission < 25
    this.validateShipping = shipping => shipping.shipping >= 1 && shipping.shipping < 25
    this.validateAdmin = admin => admin = !false
    this.validateTotalAmmount = totalAmmount => totalAmmount.totalAmmount == 0

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
        name: "invalidName",
        error: this.validateName,
        message: "Name should have at least 5 characters and less than 50."
      },
      {
        name: "invalidComission",
        error: this.validateComission,
        message: "Comission should be more than 1 and less than 25."
      },
      {
        name: "invalidShipping",
        error: this.validateShipping,
        message: "Shipping field can't be empty or greater than 25 charactres."
      },
      {
        name: "invalidAdmin",
        error: this.validateAdmin,
        message: "Seller must be created without admin role."
      }, {
        name: "invalidAmmount",
        error: this.validateTotalAmmount,
        message: "Seller must be created without products."
      }
    ]
  }
  add(seller) {
    const creationDate = moment().format('YYYY-MM-DDTHH:mm:ss')
    const totalAmmount = 0
    const admin = false
    const query = {
      ...seller,
      creationDate,
      totalAmmount,
      admin
    }
    const params = {
      invalidName: {
        name: seller.name.length
      },
      invalidComission: {
        comission: seller.sellerComission
      },
      invalidShipping: {
        shipping: seller.shipping.length
      },
      invalidAdmin: {
        admin: admin
      },
      invalidAmmount: {
        totalAmmount: totalAmmount
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
        ...query,
        id
      }
    })
  }

  update(seller, id) {
    const params = {
      invalidName: {
        name: seller.name.length
      },
      invalidComission: {
        comission: seller.sellerComission
      },
      invalidShipping: {
        shipping: seller.shipping.length
      }
    }
    const errors = this.validate(params)
    const existError = errors.length

    if (existError) {
      return new Promise((resolve, reject) => reject(errors))
    }
    return repositories.update(seller, id).then(results => {
      seller.address = JSON.parse(seller.address)
      return seller
    })
  }

  listAll() {
    return repositories.listAll()
  }

  findOne(id) {
    return repositories.findOne(id)
  }

  admin(id) {
    return repositories.admin(id)
  }

  delete(id) {
    return repositories.delete(id)
  }

  findProducts(id) {
    return repositories.findProducts(id)
  }

}

module.exports = new Seller()
