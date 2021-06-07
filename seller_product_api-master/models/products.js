const moment = require('moment')
const connection = require('../infra/database/connection')
const repositories = require('../repositories/product')

class Product {
  constructor() {
    this.validateName = name => name.name >= 5 && name.name <= 50
    this.validatePrice = price => price.price > 0
    this.validateDimensions = dimensions => Object.keys(dimensions.dimensions).length == 4

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
        name: "invalidPrice",
        error: this.validatePrice,
        message: "Price shoud be greater than 0."
      },
      {
        name: "invalidDimensions",
        error: this.validateDimensions,
        message: "All dimensions are required."
      }
    ]
  }

  add(product) {
    const creationDate = moment().format('YYYY-MM-DDTHH:mm:ss')
    const query = {
      creationDate,
      ...product
    }
    const params = {
      invalidName: {
        name: product.name.length
      },
      invalidPrice: {
        price: product.price
      },
      invalidDimensions: {
        dimensions: product.dimensions
      }
    }
    const errors = this.validate(params)
    const existError = errors.length

    if (existError) {
      return new Promise((resolve, reject) => reject(errors))
    }
    return repositories.add(query).then(results => {
      return {
        productId: results[0].insertId,
        ...query
      }
    })
  }

  findOne(id) {
    return repositories.findOne(id)
  }

  findByName(product) {
    return repositories.findByName(product)
  }

  delete(id) {
    return repositories.delete(id).then(results => {
      return {
        id
      }
    })
  }

  listAll() {
    return repositories.listAll()
  }

  update(product, id) {
    const params = {
      invalidName: {
        name: product.name.length
      },
      invalidPrice: {
        price: product.price
      },
      invalidDimensions: {
        dimensions: product.dimensions
      }
    }
    const errors = this.validate(params)
    const existError = errors.length

    if (existError) {
      return new Promise((resolve, reject) => reject(errors))
    }
    return repositories.update(product, id).then(results => {
      product.dimensions = JSON.parse(product.dimensions)
      return product
    })
  }


}

module.exports = new Product()
