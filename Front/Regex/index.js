'use strict'


const DataNascimento = () => {

    var dataNascimento = document.getElementById('dataNascimento');

    dataNascimento.addEventListener('keypress', () => {
        var clearField = dataNascimento.value.replace(/\D/g, "").substring(0, 11);
        dataNascimento.value = clearField;


        var lenghtinput = dataNascimento.value.length;
        var numberArrey = clearField.split("");
        var numberFormat = "";


        if (lenghtinput > 0) {
            numberFormat += `${numberArrey.slice(0, 2).join("")}/`;
        }
        if (lenghtinput > 2) {
            numberFormat += `${numberArrey.slice(2, 4).join("")}/`;
        }
        if (lenghtinput > 4) {
            numberFormat += `${numberArrey.slice(4, 8).join("")}`;
        }

        dataNascimento.value = numberFormat;
    })


}
DataNascimento();


const NumeroTelefone = async () => {
    var telphone = document.getElementById('telefone');

    telphone.addEventListener('keypress', () => {
        var clearField = telphone.value.replace(/\D/g, "").substring(0, 10);
        telphone.value = clearField;


        var lenghtinput = telphone.value.length;
        var numberArrey = clearField.split("");
        var numberFormat = "";


        if (lenghtinput > 0) {
            numberFormat += `(${numberArrey.slice(0, 2).join("")})`;
        }
        if (lenghtinput > 2) {
            numberFormat += ` ${numberArrey.slice(2, 6).join("")}-`;
        }
        if (lenghtinput > 6) {
            numberFormat += `${numberArrey.slice(6, 10).join("")}`;
        }







        telphone.value = numberFormat;
    })



}
NumeroTelefone();


const NumeroCelular = async () => {
    var phone = document.getElementById('celular');

    phone.addEventListener('keypress', () => {
        var clearField = phone.value.replace(/\D/g, "").substring(0, 12);
        phone.value = clearField;

        var lenghtinput = phone.value.length;
        var numberArrey = clearField.split("");
        var numberFormat = "";


        if (lenghtinput > 0) {
            numberFormat += `(${numberArrey.slice(0, 2).join("")})`;
        }

        if (lenghtinput > 2) {
            numberFormat += ` ${numberArrey.slice(2, 6).join("")}`;

        }

        if (lenghtinput > 5) {
            numberFormat += `-${numberArrey.slice(6, 10).join("")}`;

        }



        phone.value = numberFormat;

    })


}
NumeroCelular();
