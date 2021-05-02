function modalForm(path) {
    const btnDelete = document.querySelectorAll("#btnDelete");
    const formDelete = document.querySelector("#formDelete");

    btnDelete.forEach(btn => btn.addEventListener("click", (e) => {
        const id = e.target.dataset.id;
        formDelete.action = `${path}/${id}`;
    }));
}
