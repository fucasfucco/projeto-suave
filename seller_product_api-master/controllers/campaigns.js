const Campaign = require("../models/campaigns");
const { findItems } = require("../repositories/campaign");
const campaign = require("../repositories/campaign");

module.exports = (app) => {
  app.delete("/campaign/:id", (req, res) => {
    id = req.params.id;

    Campaign.delete(id)
      .then(res.status(204).json())
      .catch((err) => res.status(400).json(err));
  });

  app.post("/campaign/delete/:id", (req, res) => {
    id = req.params.id;

    Campaign.delete(id)
      .then(res.status(204).json())
      .catch((err) => res.status(400).json(err));
  });


  app.post("/campaign/delete/:id", (req, res) => {
    id = req.params.id;

    Campaign.delete(id)
      .then(res.status(204).json())
      .catch((err) => res.status(400).json(err));
  });

  app.get("/campaign/:id", (req, res) => {
    id = req.params.id;

    Campaign.findOne(id)
      .then((response) => {
        response[0].items = JSON.parse(response[0].items);
        res.status(200).json(response[0]);
      })
      .catch((err) => res.status(400).json(err));
  });




  app.post("/campaign/update/:id", (req, res) => {
    id = req.params.id;
    updated = req.body;

    Campaign.update(id, updated)
    .then(update => {
      res.status(200).json(update)
    }).catch(err => res.status(400).json(err))
  })


  app.patch("/campaign/update/:id", (req, res) => {
    id = req.params.id;
    updated = req.body;

    Campaign.update(id, updated)
    .then(update => {
      res.status(200).json(update)
    }).catch(err => res.status(400).json(err))
  })


  app
    .route("/campaigns")

    .post((req, res) => {
      camp = req.body;
      Campaign.add(camp)
        .then((newCampaign) => {
          
          res.send(`<h1>Criado com sucesso!</h1><form action="http://localhost/projeto-suave/seller_product_api-master/view/user/produto.php" method="GET"><input type="hidden" name="ID" value="${newCampaign.campaignId}"><button>Visualizar</button></form>`)
        })
        .catch((err) => res.status(400).json(err));
    })

    .get((req, res) => {
      Campaign.listAll()
        .then((response) => {
          response.forEach(
            (response) => (response.items = JSON.parse(response.items))
          );

          res.status(200).json(response);
        })
        .catch((err) => res.status(400).json(err));
    });
};
