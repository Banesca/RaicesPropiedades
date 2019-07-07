export interface IFacebookPostRs {
    data: IFacebookPost[];
  }
  
  export interface IFacebookPost {
    id: number;
    message: string;
    link: string;
    created_time: string;
  }