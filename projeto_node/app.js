const express = require("express");
const app = express();

// Importa o model Usuario (ajuste o caminho conforme seu projeto)
const path = require("path"); // ou ./bd.js se exportar o model láconst path = require("path");
const { Usuario } = require(path.resolve(__dirname, "bd.js"));

// Configuração do Handlebars
const handlebars = require("express-handlebars");
app.engine("handlebars", handlebars.engine({ defaultLayout: "main" }));
app.set("view engine", "handlebars");

// Configuração body-parser
const bodyParser = require("body-parser");
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Rotas
app.get("/formulario", function (req, res) {
  res.render("formulario");
});

app.post("/adicionar", function (req, res) {
  const nome = req.body.txtNome;
  const email = req.body.txtEmail;
  const senha = req.body.txtSenha;
  const idade = req.body.txtIdade;

  Usuario.create({
    nome: nome,
    email: email,
    senha: senha,
    idade: idade,
  })
    .then(() => {
      res.redirect("/visualizar?msg=Usuário cadastrado com sucesso!");
    })
    .catch((err) => {
      res.redirect("/visualizar?msg=Erro ao cadastrar usuário: ");
    });
});

app.get("/visualizar", function (req, res) {
  const mensagem = req.query.msg;
  Usuario.findAll()
    .then(function (elementos) {
      const usuarios = elementos.map((u) => u.get({ plain: true }));

      res.render("visual", { elementos: usuarios, mensagem: mensagem });
    })
    .catch((err) => {
      res.send("Erro ao buscar usuários: " + err);
    });
});

// Inicia o servidor
app.listen(8000, function () {
  console.log("Servidor Rodando");
});
