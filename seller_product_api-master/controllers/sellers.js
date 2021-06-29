const Seller = require('../models/sellers')

module.exports = app => {

  app.route("/sellers")

    .post((req, res) => {
      seller = req.body

      Seller.add(seller)
        .then(newSeller =>{
          newSeller.address = JSON.parse(newSeller.address)

          res.send(`<h1>Criado com sucesso!</h1><form action="http://localhost/projeto-suave/seller_product_api-master/view/admin/seller.php" method="GET"><input type="hidden" name="ID" value="${newSeller.id}"><button>Visualizar</button></form>`)
        }
        ).catch(err => res.status(400).json(err))
    })

    .get((req, res) => {
      Seller.listAll()
        .then(response => {
          response.forEach(response => response.address = (JSON.parse(response.address)));

          res.status(200).json(response)
        }).catch(err => res.status(400).json(err))
    })


  //-------------------------------------->

  app.route("/seller/:id")
    .get((req, res) => {
      id = req.params.id

      Seller.findOne(id)
        .then(response => {
          if (response[0] == null)
            res.status(404).json(response[0])
          response[0].address = JSON.parse(response[0].address)
          res.status(200).json(response[0])
        }).catch(err => res.status(400).json(err))
    })

    .patch((req, res) => {
      id = req.params.id
      seller = req.body

      Seller.update(seller, id).then(response => {
        res.status(200).json(response)
      }).catch(err => res.status(404).json(err))
    })

    .delete((req, res) => {
      id = req.params.id

      Seller.delete(id)
      .then(res.status(204).json())
      .catch(err => res.status(404).json(err))
    })
  //-------------------------------------->

  app.put("/seller/admin/:id", (req, res) => {
    id = req.params.id

    Seller.findOne(id)
      .then(response => {
        response[0].address = JSON.parse(response[0].address)
        if (response[0] == null || response[0].admin == 1)
          res.status(400).json({
            response: response[0],
            errorMessage: "Seller didn't founded or already have admin property."
          })
        Seller.admin(id)
          .then(() => {
            res.status(200).json({response: {...response[0], admin: 1}})
          })
          .catch(err => res.status(400))
      }).catch(err => res.status(400).json(err))
  })

  app.get("/seller/products/:id", (req, res) => {
    id= req.params.id

    Seller.findProducts(id)
    .then(response =>{
      response.forEach(response => {
        delete response.sellerId
        response.dimensions = JSON.parse(response.dimensions)
      })
      res.status(200).json(response)
    })
    .catch(err => res.status(404).json(err))
  })

  app.post("/update/seller/:id", (req, res) => {
    id = req.params.id
    seller = req.body

    Seller.update(seller, id).then(response => {
      res.send(`<h1>Criado com sucesso!</h1><form action="http://localhost/projeto-suave/seller_product_api-master/view/admin/seller.php" method="GET"><input type="hidden" name="ID" value="${id}"><button>Visualizar</button></form>`)
    }).catch(err => res.status(404).json(err))
  })
  app.post("/delete/seller/:id", (req, res) => {
    id = req.params.id

    Seller.delete(id)
    .then(res.status(204).json())
    .catch(err => res.status(404).json(err))
  })

}
