const Campaign = require('../models/campaigns')
const campaign = require('../repositories/campaign')

module.exports = app => {
    
    app.delete("/campaign/:id", (req, res) => {
        id = req.params.id

        Campaign.delete(id)
        .then(res.status(204).json() 
        ).catch(err => res.status(400).json(err))
    })

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

    
}
