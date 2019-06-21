export interface IFacebookPostRs {
    data: IFacebookPost[];
  }
  
  export interface IFacebookPost {
    id: number;
    message: string;
    created_time: string;
  }