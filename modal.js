const btnsDeletar = document.querySelectorAll('#btn-deletar')
const modals = document.querySelectorAll('#modal-delete')
const btnsClose = document.querySelectorAll('#btn-cancelar')

for(let i=0; i<btnsDeletar.length; i++){
    btnsDeletar[i].addEventListener('click',()=>{
        modals[i].classList.add('alerta');
    })
    btnsClose[i].addEventListener('click',()=>{
        modals[i].classList.remove('alerta')
    })
}