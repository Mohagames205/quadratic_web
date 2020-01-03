function calculate (form){

    let eerstegetal = parseFloat(form.elements["xkwadraat"].value);
    let tweedegetal = parseFloat(form.elements["x"].value);
    let derdegetal = parseFloat(form.elements["getal"].value);


    if (!isNaN(eerstegetal) && !isNaN(tweedegetal) && !isNaN(derdegetal)) {
        let discriminant = Math.pow(tweedegetal, 2) - (4 * eerstegetal * derdegetal);
        let sqrt_discriminant = Math.sqrt(discriminant);

        let eerste_oplossing = (-tweedegetal + sqrt_discriminant) / (2*eerstegetal);
        let tweede_oplossing = (-tweedegetal - sqrt_discriminant) / (2*eerstegetal);

        let node = document.getElementById("uitkomst");
        node.className = "materialbox";
        node.innerHTML = `
          <h2> Uitkomst </h2>
          <p><b>Discriminant:</b> ${discriminant} <br><b>Vierkantswortel van de discriminant: </b>${sqrt_discriminant}</p>
          <p><b>Eerste oplossing: </b>${eerste_oplossing}<br><b>Tweede oplossing: </b>${tweede_oplossing}</p>`;
    }
    return false;
}