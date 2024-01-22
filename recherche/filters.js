var annoncesSections = document.querySelectorAll(".container .sections section");
var filterButton = document.getElementById("filtrer");
var selectTri = document.getElementById("tri");
var selectCategorie = document.getElementById("categorie");

/*======================================*/

class Annonce {
  constructor(section, prix, categorie, datePublication) {
    this.section = section;
    this.prix = prix;
    this.categorie = categorie;
    this.datePublication = datePublication;
  }
}

function extractAnnonces(annoncesSections) {
  var result = [];
  Array.from(annoncesSections).forEach((section) => {
    let prixStr = section.children.prix.innerHTML;
    let prix = parseFloat(prixStr.substring(0, prixStr.length - 1).trim());

    let categorie = section.children.categorie.innerHTML;
    let datePublication = section.children.date.innerHTML;
    let annonce = new Annonce(section, prix, categorie, datePublication);
    result.push(annonce);
  });
  return result;
}

function sortByPriceAscending(annonces) {
  annonces.sort((a, b) => a.prix - b.prix);
}

function sortByPriceDescending(annonces) {
  annonces.sort((a, b) => b.prix - a.prix);
}

function createSectionsInnerHTML(annonces) {
  var result = "";
  for (var annonce of annonces) {
    result += annonce.section.innerHTML;
  }
  return result;
}

/*======================================================*/

var annonces = extractAnnonces(annoncesSections);

filterButton.addEventListener("click", () => {
  var sections = document.querySelector(".container .sections");
  if (selectTri.value === "croissant") {
    var sortedSections = createSectionsInnerHTML(annonces);
    sortByPriceAscending(annonces);
    sections.innerHTML = "";
    console.log(sortedSections);
  }
  console.log(annonces);
});

console.log(annoncesSections);
console.log(annonces);
