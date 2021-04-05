import {Musee} from './musee.model';
import {HistoireBateau} from './histoireBateau.model';
import {LocalisationBateau} from './localisationBateau.model';
import {PlanningVisite} from './planningVisite.model';

export interface Bateau {
  id?: number;
  nom?: string;
  type?: string;
  materiau?: string;
  prixAchat?: number;
  longueur?: number;
  largeur?: number;
  poids?: number;
  capacitePersonne?: number;
  histoireBateau?: HistoireBateau;
  localisationVisite?: LocalisationBateau;
  planningVisite?: PlanningVisite;
  musee?: Musee;
}
