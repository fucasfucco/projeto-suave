const Product = require('../models/products')

module.exports = app => {

  app.route("/products")

  .post((req, res) => {
    product = req.body
    Product.add(product)
    .then(newProduct => {
      newProduct.dimensions = JSON.parse(newProduct.dimensions)

      res.status(201).json(newProduct)}
    ).catch(err => res.status(400).json(err))
  })

  .get((req, res) => {
    Product.listAll()
      .then(response => {
        console.log(response)
        response.forEach(response => response.dimensions = (JSON.parse(response.dimensions)));

        res.status(200).json(response)
      }).catch(err => res.status(400).json(err))
  })

  
  app.route("/product/:id")

    .get((req, res) => {
      id = req.params.id
      Product.findOne(id)
      .then(response => {
        response[0].dimensions = JSON.parse(response[0].dimensions)
        res.status(200).json(response[0])
      }).catch(err => res.status(404).json(err))
    })

    .delete((req, res) => {
      id = req.params.id
      Product.delete(id)
      .then(res.status(204).json())
      .catch(err => res.status(404).json(err))
    })

    .patch((req, res) => {
      id = req.params.id
      product = req.body

      Product.update(product, id).then(response => {
        res.status(200).json(response)
      }).catch(err => res.status(400).json(err))
    })

    app.get("/product/name/:product", (req, res) => {
      product = req.params.product
      Product.findByName(product).then(response => {
        res.status(200).json(response)
      }).catch(err => res.status(400).json(err))
    })

    app.post("/delete/product/:id", (req, res) => {
      id = req.params.id
      Product.delete(id)
      .then(res.status(204).json())
      .catch(err => res.status(404).json(err))
    })

    app.post("/update/product/:id", (req, res) => {
        id = req.params.id
        product = req.body
  
        Product.update(product, id).then(response => {
          res.status(200).json(response)
        }).catch(err => res.status(400).json(err))
    })
}
