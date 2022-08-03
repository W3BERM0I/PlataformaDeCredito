export default class Emprestimo {
  constructor(id='', valor='', taxa_juros='', data_solicitacao='', data_quitacao='', valor_pago='', status='', cliente_id='', qtd_parcelas){
    this.id = id;
    this.valor = valor;
    this.taxa_juros = taxa_juros;
    this.data_solicitacao = data_solicitacao;
    this.data_quitacao = data_quitacao;
    this.valor_pago = valor_pago;
    this.status = status;
    this.cliente_id = cliente_id;
    this.qtd_parcelas = qtd_parcelas;
  }
}