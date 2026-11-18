fetch("http://localhost:8000/?controller=producto&action=api&funcion=todos")
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.log(error))
