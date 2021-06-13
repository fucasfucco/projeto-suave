const Campaign = require('../models/campaigns')
const campaign = require('../repositories/campaign')

module.exports = app => {
    
    app.get("/campaign/:id", (req, res) => {
        id = req.params.id

        Campaign.findOne(id)
        .then(response =>{
            response[0].items = JSON.parse(response[0].items)
            res.status(200).json(response[0])
        }
        ).catch(err => res.status(400).json(err))
    })

    app.route("/campaigns")

    .post((req, res) => {
        campaign = req.body

        Campaign.add(campaign)
        .then(newCampaign => {

            res.status(201).json(newCampaign)
        }).catch(err => res.status(400).json(err))
    })

    .get((req, res) => {
        Campaign.listAll()
        .then(response => {
            response.forEach(response => response.items = (JSON.parse(response.items)))

            res.status(200).json(response)
        }).catch(err => res.status(400).json(err))
    })


    app.delete((req, res) => {
        id = req.params.id

        Campaign.delete(id)
        .then(res.status(204).json(response) 
        ).catch(err => res.status(400).json(err))
    })

    
}

//    .patch((req, res) => {
//      id = req.params.id
//      seller = req.body
//
//      Seller.update(seller, id).then(response => {
//        res.status(200).json(response)
//      }).catch(err => res.status(404).json(err))
//    })
//
//    .delete((req, res) => {
//      id = req.params.id
//
//      Seller.delete(id)
//      .then(res.status(204).json())
//      .catch(err => res.status(404).json(err))
//    })
//  //-------------------------------------->
//
//  app.put("/seller/admin/:id", (req, res) => {
//    id = req.params.id
//
//    Seller.findOne(id)
//      .then(response => {
//        response[0].address = JSON.parse(response[0].address)
//        if (response[0] == null || response[0].admin == 1)
//          res.status(400).json({
//            response: response[0],
//            errorMessage: "Seller didn't founded or already have admin property."
//          })
//        Seller.admin(id)
//          .then(() => {
//            res.status(200).json({response: {...response[0], admin: 1}})
//          })
//          .catch(err => res.status(400))
//      }).catch(err => res.status(400).json(err))
//  })
//
//  app.get("/seller/products/:id", (req, res) => {
//    id= req.params.id
//
//    Seller.findProducts(id)
//    .then(response =>{
//      response.forEach(response => {
//        delete response.sellerId
//        response.dimensions = JSON.parse(response.dimensions)
//      })
//      res.status(200).json(response)
//    })
//    .catch(err => res.status(404).json(err))
//  })
//
//  app.post("/update/seller/:id", (req, res) => {
//    id = req.params.id
//    seller = req.body
//
//    Seller.update(seller, id).then(response => {
//      res.status(200).json(response)
//    }).catch(err => res.status(404).json(err))
//  })
//  app.post("/delete/seller/:id", (req, res) => {
//    id = req.params.id
//
//    Seller.delete(id)
//    .then(res.status(204).json())
//    .catch(err => res.status(404).json(err))
//  })
//
//}
//