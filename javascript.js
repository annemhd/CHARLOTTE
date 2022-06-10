// const btnContact = document.querySelector('.btn-contact')
// const contactForm = document.querySelector('#contact-form')

// btnContact.addEventListener('click', () => {
//     contactForm.classList.toggle('hidden')
// })

// const btnGestionCompte = document.querySelector('.btn-gestioncompte')
// const gestionCompteForm = document.querySelector('#gestioncompte-form')

// btnGestionCompte.addEventListener('click', () => {
//     gestionCompteForm.classList.toggle('hidden')
// })

// const btnAjoutEvent = document.querySelector('.btn-ajoutevent')
// const ajoutEventForm = document.querySelector('#ajoutevent-form')

// // btnAjoutEvent.addEventListener('click', () => {
// //     ajoutEventForm.classList.toggle('hidden')
// // })

// const btnCompte = document.querySelector('.btn-compte')
// const dropdown = document.getElementById('#dropdown-compte')
// btnCompte.addEventListener('click', () => {
//     dropdown.classList.toggle('hidden')
// })

// const btnConnexion = document.querySelector('#btn-connexion')

// const btnInscription = document.querySelector('.btn-inscription')
// const inscriptionForm = document.querySelector('#inscription-form')

// btnInscription.addEventListener('click', () => {
//     inscriptionForm.classList.toggle('hidden')
// })

// var btnClose = document.querySelectorAll('.close')
// var modalEvent = document.getElementById('fiche-event')
// var i

// for (i = 0; i < btnClose.length; i++) {
//     btnClose[i].addEventListener('click', () => {
//         modalEvent.classList.toggle('hidden')
//     })
// }

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
// function dropdown() {
//     document.querySelector('#identification-dropdown').classList.toggle('hidden')
// }

function dropdown(a) {
    document.querySelector(a).classList.toggle('hidden')
}

function modal(b) {
    document.querySelector(b).classList.toggle('hidden')
}

var alert = document.querySelector('.alert')
setTimeout(function () {
    alert.classList.add('hidden')
}, 1700)

// function statut(c) {
//     if ((c.id = 'btn-particulier')) {
//         document.querySelector('#' + c).classList.add('bg-blue-700')
//     } else if ((c.id = 'btn-organisation')) {
//         document.querySelector('#' + c).classList.add('bg-blue-700')
//         document.querySelector('#btn-particulier').remove('bg-blue_700')
//     }
// }

const btnParticulier = document.querySelector('#btn-particulier')
const btnOrganisation = document.querySelector('#btn-organisation')

const particulierInput = document.querySelector('#particulier-input')
const organisationInput = document.querySelector('#organisation-input')

btnParticulier.addEventListener('click', () => {
    particulierInput.classList.toggle('hidden')
    organisationInput.classList.toggle('hidden')
    btnParticulier.classList.toggle('bg-slate-300')
    btnOrganisation.classList.toggle('bg-blue-700')

    btnOrganisation.classList.add('hover:bg-slate-400')

    btnParticulier.classList.add('text-white')

    btnOrganisation.classList.remove('text-white')
})

btnOrganisation.addEventListener('click', () => {
    particulierInput.classList.toggle('hidden')
    organisationInput.classList.toggle('hidden')
    btnParticulier.classList.toggle('bg-slate-300')
    btnOrganisation.classList.toggle('bg-blue-700')

    btnOrganisation.classList.add('text-white')

    btnParticulier.classList.add('hover:bg-slate-400')
    btnOrganisation.classList.remove('hover:bg-slate-400')

    btnParticulier.classList.remove('text-white')
})
