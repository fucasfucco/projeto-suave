const connection = require('../infra/database/connection')
const repositories = require('../repositories/campaign')

class Campaign {
    add(newCampaign) {
        return repositories.add(newCampaign).then(results => {
          const id = results.insertId
          return {
            ...newCampaign,
            id
          }
        })
      }

      listAll() {
        return repositories.listAll()
      }
    
      findOne(id) {
        return repositories.findOne(id)
      }
    
      delete(id) {
        return repositories.delete(id)
      }
}

module.exports = new Campaign()
