import {Bateau} from './bateau.model';

export interface HistoireBateau {
  id?: number;
  anneeLancement?: Date;
  constructeur?: string;
  proprietaire?: string;
  anneeEntreeCollection?: number;
  dateMonumentHistorique?: Date;
  anneeRestauration?: Date;
  historique?: Array<string>;
  temoignage?: string;
  Bateau?: Bateau;
}
