export default class Parcela {
    constructor(id='', valor='', numero='', data_vencimento='', data_pagamento='', multa='', status='', emprestimo_id=''){
      this.id = id;
      this.valor = valor;
      this.numero = numero;
      this.data_vencimento = data_vencimento;
      this.data_pagamento = data_pagamento;
      this.multa = multa;
      this.status = status;
      this.emprestimo_id = emprestimo_id;
    }
}