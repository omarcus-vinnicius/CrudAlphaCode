import {
    ReadCustomersID,
    CreatCustomer,
    DeleteCustomer,
    UptadeCustomer
} from '../service/service.js';
import { ReadList } from './app-list.js';



const IsValide = () => {
    document.getElementById('modal-for').reportValidity();
}


const Clear = () => {
    const fields = document.querySelectorAll('.modal-field');
    fields.forEach(field => field.value = "");
}

const SalveCustomer = () => {
    const NotificacaoEmail = document.getElementById('ntemail').checked
    const NotificacaoWhatsapp = document.getElementById('ntwhatsapp').checked
    const NotificacaoSMS = document.getElementById('ntsms').checked


    if (IsValide) {
        const customer = {
            Nome: document.getElementById('nome').value,
            Email: document.getElementById('email').value,
            DataDeNascimento: document.getElementById('dataNascimento').value,
            Profissao: document.getElementById('profissao').value,
            TelefoneContato: document.getElementById('telefone').value,
            CelularContato: document.getElementById('celular').value,
            NotificacaoEmail: `${NotificacaoEmail}`,
            NotificacaoWhatsapp: `${NotificacaoWhatsapp}`,
            NotificacaoSMS: `${NotificacaoSMS}`
        }
        const index = document.getElementById('nome').dataset.index;

        if (index == 'new') {
            CreatCustomer(customer);
            ReadList();
            Clear();
        } else {
            UptadeCustomer(index, customer);
            Clear();

        }

    }

}

const FillForm = (customer) => {

    document.getElementById('nome').value = customer.Nome,
        document.getElementById('email').value = customer.Email,
        document.getElementById('dataNascimento').value = customer.DataDeNascimento,
        document.getElementById('profissao').value = customer.Profissao,
        document.getElementById('telefone').value = customer.TelefoneContato,
        document.getElementById('celular').value = customer.CelularContato,
        document.getElementById('nome').dataset.index = customer.IdUser;


}


const Editcustomer = async (index) => {
    const customer = await ReadCustomersID(index);
    const customerID = await customer[0];
    FillForm(customerID);
}

const Delete = async () => {

    if (event.target.type == 'image') {

        const [action, index] = event.target.id.split('-');


        if (action == 'edit') {

            Editcustomer(index);

        } else if (action == 'delete') {

            DeleteCustomer(index);
            Clear();

        }

    }


}



document.getElementById('salvar').addEventListener('click', SalveCustomer);
document.querySelector('#Tablelist>tbody').addEventListener('click', Delete);