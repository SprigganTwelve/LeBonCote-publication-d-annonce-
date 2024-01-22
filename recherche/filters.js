var annoncesSections = document.querySelectorAll(".container .sections section");
var filterButton = document.getElementById("filtrer");
var selectTri = document.getElementById("tri");
var selectCategorie = document.getElementById("categorie");
var sections = document.querySelector(".container .sections");

/*======================================*/

class Annonce {
  constructor(section, prix, categorie, timestamp) {
    this.section = section;
    this.prix = prix;
    this.categorie = categorie;
    this.timestamp = timestamp;
  }
}

function toTimestamp(strDate) {
  const dt = new Date(strDate).getTime();
  return dt / 1000;
}

function extractAnnonces(annoncesSections) {
  var result = [];
  Array.from(annoncesSections).forEach((section) => {
    let prixStr = section.children.prix.innerHTML;
    let prix = parseFloat(prixStr.substring(0, prixStr.length - 1).trim());

    let categorie = section.children.categorie.innerHTML;

    let datePublicationStr = section.children.date.innerHTML;
    let timestamp = toTimestamp(datePublicationStr);

    let annonce = new Annonce(section, prix, categorie, timestamp);
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

function sortByTimestampAscending(annonces) {
  annonces.sort((a, b) => a.timestamp - b.timestamp);
}

function sortByTimestampDescending(annonces) {
  annonces.sort((a, b) => b.timestamp - a.timestamp);
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
//let deepCopyAnnonces = JSON.parse(JSON.stringify(annonces));

filterButton.addEventListener("click", () => {
  var sections = document.querySelector(".container .sections");
  if (selectTri.value === "croissant") {
    for (let annonce of annonces) {
      annonce.section.remove();
    }
    sortByPriceAscending(annonces);
    for (let annonce of annonces) {
      sections.append(annonce.section);
    }
  }
  if (selectTri.value === "decroissant") {
    for (let annonce of annonces) {
      annonce.section.remove();
    }
    sortByPriceDescending(annonces);
    for (let annonce of annonces) {
      sections.append(annonce.section);
    }
  }
  if (selectTri.value === "ancien") {
    for (let annonce of annonces) {
      annonce.section.remove();
    }
    sortByTimestampAscending(annonces);
    for (let annonce of annonces) {
      sections.append(annonce.section);
    }
  }
  if (selectTri.value === "recent") {
    for (let annonce of annonces) {
      annonce.section.remove();
    }
    sortByTimestampDescending(annonces);
    for (let annonce of annonces) {
      sections.append(annonce.section);
    }
  }
});

console.log(annoncesSections);
console.log(sections);
console.log(annonces);
