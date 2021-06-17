const Client = require('../models/clients')

module.exports = app => {

  app.route("/clients")

  .post((req, res) => {
    client = req.body
    Client.add(client)
    .then(newClient => {
      newClient.address = JSON.parse(newClient.address)
      res.status(201).json(newClient)
    }).catch(err => res.status(400).json(err))
  })

  .get((req, res) => {
    Client.listAll()
    .then(clients => {
      clients.forEach(clients => clients.address = JSON.parse(clients.address))

      res.status(200).json(clients)
    }).catch(err => res.status(400).json(err))
  })

  app.route("/client/:id")

  .get((req, res) => {
    id = req.params.id
    Client.findOne(id)
    .then(client => {
      client = client[0]
      client.address = JSON.parse(client.address)
      res.status(200).json(client)
    }).catch(err => res.status(404).json(err))

  })

  .patch((req, res) => {
    client = req.body
    id = req.params.id
    Client.update(client, id)
    .then(client => {
      res.status(200).json(client)
    }).catch(err => res.status(400).json(err))
  })

  .delete((req, res) => {
    id = req.params.id
    Client.delete(id)
    .then(response => res.status(204).json())
    .catch(err => res.status(400).json(err))
  })
}
