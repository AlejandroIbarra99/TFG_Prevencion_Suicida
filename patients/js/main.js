function openNewContact() {
  window.location.href ='./new-contact', 'Nuevo Contacto';
}
document.getElementById('btnOpenNewContact').addEventListener('click', openNewContact);




/*
const btnSaveDiary = document.querySelector("#btnSaveDiary");

btnSaveDiary.addEventListener("click", () => {
  const diaryEntry = document.querySelector("#diarytext").value;

  fetch("./save_daily.php", {
    method: "POST",
    body: JSON.stringify({ diaryEntry }),
    headers: { "Content-Type": "application/json" },
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
*/
const btnShowDiary = document.querySelector("#btnShowDiary");

// Agregar un evento de clic al botón "Ver diario"
btnShowDiary.addEventListener("click", () => {
  fetch("./showdaily.php")
    .then((response) => response.json())
    .then((data) => {
      const diaryEntries = document.querySelector("#dailyentries");
      diaryEntries.innerHTML = "";
      data.forEach((entry) => {
        // Crear un elemento HTML para mostrar la fecha del día
        const dayDiv = document.createElement("div");
        dayDiv.textContent = entry.day;
        diaryEntries.appendChild(dayDiv);
        
        // Crear un elemento HTML para mostrar las entradas del día
        const entriesDiv = document.createElement("div");
        entriesDiv.innerHTML = entry.entries;
        diaryEntries.appendChild(entriesDiv);
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});

