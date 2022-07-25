  function EstadoNome(cbNome) {
    var nome = document.getElementById("nome");
    nome.disabled = cbNome.checked ? false : true;
    if (!nome.disabled) {
      nome.focus();
    }
  }

  function EstadoCpf(cbCpf) {
    var cpf = document.getElementById("cpf");
    cpf.disabled = cbCpf.checked ? false : true;
    if (!cpf.disabled) {
      cpf.focus();
    }
  }

  function EstadoTelefone(cbTelefone) {
    var telefone = document.getElementById("telefone");
    telefone.disabled = cbTelefone.checked ? false : true;
    if (!telefone.disabled) {
      telefone.focus();
    }
  }

  function EstadoEndereco(cbEnredeco) {
    var endereco = document.getElementById("endereco");
    endereco.disabled = cbEnredeco.checked ? false : true;
    if (!endereco.disabled) {
      endereco.focus();
    }
  }

  function EstadoProfissao(cbProfissao) {
    var profissao = document.getElementById("profissao");
    profissao.disabled = cbProfissao.checked ? false : true;
    if (!profissao.disabled) {
      profissao.focus();
    }
  }

  function EstadoRenda(cbRenda) {
    var renda = document.getElementById("renda");
    renda.disabled = cbRenda.checked ? false : true;
    if (!renda.disabled) {
      renda.focus();
    }
  }

  function EstadoEmail(cbEmail) {
    var email = document.getElementById("email");
    email.disabled = cbEmail.checked ? false : true;
    if (!email.disabled) {
      email.focus();
    }
  }

  function EstadoSenha(cbSenha) {
    var senhas = document.getElementById("senhas");
    if (cbSenha.checked) {
      senhas.style.display = "flex";
    } else {
      senhas.style.display = "none";
    }
    if (!senhas.disabled) {
      senhas.focus();
    }
  }