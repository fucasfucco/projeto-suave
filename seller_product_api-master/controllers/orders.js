const Order = require('../models/orders')

module.exports = app => {

  app.route("/orders")

    .post((req, res) => {
      order = req.body
      Order.add(order)
        .then(newOrder => {
          res.status(201).json(newOrder)
        }).catch(err => res.status(400).json(err))
    })

    .get((req, res) => {
      Order.listAll().then(orders => {
        orders.forEach(orders => {
          orders.clientAddress = JSON.parse(orders.clientAddress)
          orders.items = JSON.parse(orders.items)
        })
        res.status(200).json(orders)
      }).catch(err => res.status(404).json(err))
    })


  app.route("/order/:id")

    .delete((req, res) => {
      id = req.params.id
      Order.findOneAndDelete(id).then(() => {
        res.status(204).json()
      }).catch(err => res.status(400).json(err))
    })

    .get((req, res) => {
      id = req.params.id
      Order.findOne(id).then(order => {
        order[0].items = JSON.parse(order[0].items)
        order[0].clientAddress = JSON.parse(order[0].clientAddress)
        res.status(200).json(order[0])
      }).catch(err => res.status(404).json(err))
    })

    .patch((req, res) => {
      id = req.params.id
      order = req.body
      Order.update(order, id).then(order => res.status(200).json(order)
    ).catch(err => res.status(404).json(err))
    })
}
