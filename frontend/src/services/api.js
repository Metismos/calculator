import axios from 'axios';

export const calculate = ({ firstOperand = 0.0, secondOperand = 0.0, operationType = ''}) =>
  axios.post(`/api/v1/calculation?firstOperand=${firstOperand}&secondOperand=${secondOperand}&operationType=${operationType}`).then(r => r.data);

export default {
  calculate
};
