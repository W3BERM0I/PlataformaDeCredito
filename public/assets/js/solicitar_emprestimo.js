  const args = {
    afterFormat(e) { console.log('afterFormat', e); },
    allowNegative: false,
    beforeFormat(e) { console.log('beforeFormat', e); },
    negativeSignAfter: false,
    prefix: 'R$',
    suffix: '',
    fixed: true,
    fractionDigits: 2,
    decimalSeparator: ',',
    thousandsSeparator: '.',
    cursor: 'end'
  };

  input.oninput = () => {
    input.value = SimpleMaskMoney.format(input.value);
  }

  // Your send method
  input.onkeyup = (e) => {
    if (e.key !== "Enter") return;
    // Returns the value of your input as a number:
    SimpleMaskMoney.formatToNumber(input.value);
  }
