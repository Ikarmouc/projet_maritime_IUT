import { LocalisationBateau } from "./localisationBateau.model";

export interface Bateau{
    id?                 : number;
    musee_id?           : number;
    nom?                : string;
    type?               : string;
    materiau?           : string;
    prix_achat?         : number;
    longueur?           : number;
    largeur?            : number;
    poids?              : number;
    capacite_personne?  : number
}