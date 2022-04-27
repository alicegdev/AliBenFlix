function buttonClick(inputId) {
  document.getElementById(inputId).setAttribute("disabled", "false");
  document.getElementById(inputId).setAttribute("checked", "false");
  // créer tout ce code en hidden dans le HTML et le révéler avec js
  // let newSelect = document.createElement("select");
  // if (inputId == "actor-checkbox") {
  //   let actorUl = document.getElementById("actor_preferences");
  //   actorUl.appendChild(newSelect);
  //   for (let i = 0; i < selectArray.length; i++) {
  //     var option = document.createElement("option");
  //     option.value = selectArray[i];
  //     option.text = selectArray[i];
  //     newSelect.appendChild(option);
  //   }
  // }
}

// essayer une fonction set Attribute
