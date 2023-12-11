// Fonction pour ajouter une nouvelle tâche
function addTask() {
    const title = document.getElementById("title").value;
    const description = document.getElementById("description").value;
    if (title && description) {
        // Récupération des listes de tâches en cours et terminées
        const taskListInProgress = document.getElementById("task-list-in-progress");
        const taskListCompleted = document.getElementById("task-list-completed");

        // Création d'un nouvel élément de liste (li)
        const li = document.createElement("li");

        // Création de la case à cocher pour marquer la tâche comme terminée
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";

        // Ajout d'un écouteur d'événements pour déplacer la tâche vers la liste appropriée
        checkbox.addEventListener("change", function () {
            if (checkbox.checked) {
                taskListCompleted.appendChild(li);
            } else {
                taskListInProgress.appendChild(li);
            }
        });

        // Création d'un élément contenant les détails de la tâche
        const taskInfo = document.createElement("div");
        taskInfo.innerHTML = `<strong>${title}</strong>: ${description}`;

        // Création du bouton de suppression de la tâche
        const deleteButton = document.createElement("button");
        deleteButton.className = "delete-button";
        deleteButton.innerHTML = "Supprimer";
        deleteButton.onclick = function () {
            li.remove();
        };

        // Ajout des éléments à l'élément de liste (li)
        li.appendChild(checkbox);
        li.appendChild(taskInfo);
        li.appendChild(deleteButton);

        // Ajout de la tâche à la liste en cours
        taskListInProgress.appendChild(li);

        // Effacement des champs de saisie
        document.getElementById("title").value = "";
        document.getElementById("description").value = "";
    }
}