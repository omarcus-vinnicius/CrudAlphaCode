'use strict'

const url = 'http://localhost/CrudMarcus/Api/Crud/Users';

const ReadCustomers = async () => {

    const reponse = await fetch(`${url}`);

    return await reponse.json();

}

const ReadCustomersID = async (id) => {

    const reponse = await fetch(`${url}/${id}`);
    return await reponse.json();

}


const CreatCustomer = async (customer) => {
    const option = {
        method: 'POST',
        body: JSON.stringify(customer),
        headers: {
            'content-type': 'application/json'
        }
    }

    const response = await fetch(url, option);
    if (response.ok) {
        location.reload();
        console.log('POST', response.ok);
    }



}


const DeleteCustomer = async (id) => {
    const option = {
        method: 'DELETE',
    }
    const response = await fetch(`${url}/${id}`, option);

    if (response.ok) {
        location.reload();
        console.log('DELETE', response.ok);
    }



}

const UptadeCustomer = async (id, client) => {
    const option = {
        method: 'PUT',
        body: JSON.stringify(client),
        headers: {
            'content-type': 'application/json'
        }
    }
    const response = await fetch(`${url}/${id}`, option);
    if (response.ok) {
        location.reload();
        console.log('UPDATE', response.ok)
    }


}

export {
    ReadCustomers,
    ReadCustomersID,
    CreatCustomer,
    DeleteCustomer,
    UptadeCustomer

}