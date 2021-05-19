const customExpress = require('./config/expressConfig')
const connection = require('./infra/database/connection')
const Tabelas = require('./infra/database/tabels')

connection.connect(erro => {
    if (erro) {
        console.log(erro)
    } else {
        console.log('Connected with success')

        Tabelas.init(connection)

        const app = customExpress()

        app.listen(3000, () => console.log('Server is up and running at port 3000'))
    }
})
