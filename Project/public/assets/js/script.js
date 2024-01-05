(function () {
    const menuToggle = document.querySelector('.menu-toggle')
    
    menuToggle.onclick = function (e) {
        const body = document.querySelector('body')
        body.classList.toggle('hide-sidebar')
    }
})()

recuperarQtd()

async function recuperarQtd() {
    const dados = await fetch('teste.php')

    const resposta = await dados.json()

    document.getElementById("qtd-atendidos").innerHTML = resposta['total']

    document.getElementById("qtd-abertos").innerHTML = resposta['abertos']
}

setInterval(() => {
    recuperarQtd()
}, 5000)