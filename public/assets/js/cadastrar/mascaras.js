function mascara_cpf() {
  let cpf = document.getElementById('cpf');

  if(cpf.value.length == 3 || cpf.value.length == 7) {
    console.log(cpf.value.length)
    cpf.value += "."
  }
  if(cpf.value.length == 11) {
    console.log(cpf.value.length)
    cpf.value += "-"
  }
}

function mascara_telefone() {
  let cel = document.getElementById('telefone')
  console.log(cel.value.length)
  if(cel.value.length == 0) {
    cel.value += "("
  }
  if(cel.value.length == 3) {
    cel.value += ")"
  }
  if(cel.value.length == 9) {
    cel.value += "-"
  }
  console.log(cel.value.length)
}

/* function mascara_renda() {
  var renda = document.getElementById('renda')

  if(renda.value.length == 0) {
    renda.value += "R$ "
  } 
}*/