import { Musee } from './Musee.model';
import {HistoireBateau} from './HistoireBateau.model';

export interface Bateau{
  id?: number;
  museeId?: Musee;
  nomBateau?: string;
  type?: string;
  materiau?: string;
  prixAchat?: number;
  longueur?: number;
  largeur?: number;
  poids?: number;
  capacitePersonne?: number;
}
