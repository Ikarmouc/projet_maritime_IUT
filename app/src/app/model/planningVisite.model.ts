import {Bateau} from './bateau.model';

export interface PlanningVisite {
  id?: number;
  heureDebut?: Date;
  nbPersonnesInscrites?: number;
  jour?: string;
  Bateau?: Bateau;
}
