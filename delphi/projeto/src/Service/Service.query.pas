unit Service.query;

interface

uses
  System.SysUtils,
  System.Classes,
  FireDAC.Stan.Intf,
  FireDAC.Stan.Option,
  FireDAC.Stan.Param,
  FireDAC.Stan.Error,
  FireDAC.DatS,
  FireDAC.Phys.Intf,
  FireDAC.DApt.Intf,
  FireDAC.Stan.Async,
  FireDAC.DApt, Data.DB,
  FireDAC.Comp.DataSet,
  FireDAC.Comp.Client,
  Service.conexao;

type
  TServiceQuery = class(TDataModule)
    QRY_user: TFDQuery;
    QRY_userID: TIntegerField;
    QRY_userNAME: TStringField;
    QRY_userPASS: TStringField;
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  ServiceQuery: TServiceQuery;

implementation

{%CLASSGROUP 'Vcl.Controls.TControl'}

{$R *.dfm}

end.
