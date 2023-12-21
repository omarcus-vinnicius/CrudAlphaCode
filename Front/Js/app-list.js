import { ReadCustomers } from '../service/service.js';

const ClearTable = () => {
    const rows = document.querySelectorAll('#Tablelist>tbody tr');
    rows.forEach(row => row.paretNode.removeChild(row));
}


const CreateRow = (custumer) => {
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
              <td>${custumer.Nome}</td>
              <td>${custumer.DataDeNascimento}</td>
              <td>${custumer.Email}</td>
              <td>${custumer.CelularContato}</td>
              <td class="icon_input">
              <input type="image" src="./Img/editar.png" id="edit-${custumer.IdUser}" alt="Submit">
              <input type="image" src="./Img/excluir.png" id="delete-${custumer.IdUser}" alt="Submit" />
              </td>

    `;

    document.querySelector('#Tablelist>tbody').appendChild(newRow);

}

const ReadList = async () => {
    const readlist = await ReadCustomers();
    ClearTable();
    readlist.forEach(CreateRow);

}

ReadList();

export {
    ReadList
};