const btnsDeletar = document.querySelectorAll('#btn-deletar')
const modals = document.querySelectorAll('#modal-delete')

for(let i=0; i<btnsDeletar.length; i++){
    btnsDeletar[i].addEventListener('click',()=>{
        modals[i].classList.add('alerta');
    })
}