export default class User {
  constructor(id='', nome='', email='', senha='', cpf='', telefone='', endereco='', tipo_usuario='', profissao='', renda='') {
    this.id = id;
    this.nome = nome;
    this.email = email;
    this.senha = senha;
    this.cpf = cpf;
    this.telefone = telefone;
    this.endereco = endereco;
    this.tipo_usuario = tipo_usuario;
    this.profissao = profissao;
    this.renda = renda;
  }
}