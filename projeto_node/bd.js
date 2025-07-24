const Sequelize = require("sequelize");
const sequelize = new Sequelize("db_node", "root", "", {
  host: "localhost",
  dialect: "mysql",
  port: 3306,
});

sequelize
  .authenticate()
  .then(function () {
    console.log("Conectado com sucesso!!!");
  })
  .catch(function (erro) {
    console.log("Erro ao conectar no db_node " + erro);
  });

const Usuario = sequelize.define(
  "tb_usuario",
  {
    nome: {
      type: Sequelize.STRING,
    },
    email: {
      type: Sequelize.TEXT,
    },
    senha: {
      type: Sequelize.STRING,
    },
    idade: {
      type: Sequelize.INTEGER,
    },
  },
  {
    freezeTableName: true, // <- evita pluralização automática
  }
);

Usuario.findOrCreate({
  where: { email: "mateusdamacena593@gmail.com" },
  defaults: {
    nome: "Matheus",
    senha: "123",
    idade: 22,
  },
})
  .then(([usuario, created]) => {
    if (created) {
      console.log("Usuário criado.");
    } else {
      console.log("Usuário já existe.");
    }
  })
  .catch(console.error);

module.exports = {
  Usuario,
  sequelize,
};
