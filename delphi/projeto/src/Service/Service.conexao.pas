unit Service.conexao;

interface

uses
  System.SysUtils,
  System.Classes,
  FireDAC.Stan.Intf,
  FireDAC.Stan.Option,
  FireDAC.Stan.Error,
  FireDAC.UI.Intf,
  FireDAC.Phys.Intf,
  FireDAC.Stan.Def,
  FireDAC.Stan.Pool,
  FireDAC.Stan.Async,
  FireDAC.Phys,
  FireDAC.Phys.FB,
  FireDAC.Phys.FBDef,
  FireDAC.VCLUI.Wait,
  FireDAC.Phys.IBBase,
  FireDAC.Comp.UI,
  Data.DB,
  FireDAC.Comp.Client,
  System.IniFiles;

type
  TServiceConexao = class(TDataModule)
    FDConn: TFDConnection;
    WaitCursor: TFDGUIxWaitCursor;
    FBDriverLink: TFDPhysFBDriverLink;
    procedure DataModuleCreate(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  ServiceConexao: TServiceConexao;

implementation

{%CLASSGROUP 'Vcl.Controls.TControl'}

{$R *.dfm}

procedure TServiceConexao.DataModuleCreate(Sender: TObject);
var LIniFile : TIniFile;
    LDatabase : string;
    LUser_Name : string;
    LPassword : string;
    LServidor : string;
    LPorta : integer;
    LCaminho : string;

begin
  try
  FDconn.Connected := false;

  LCaminho := ExtractFileDir(ParamStr(0)) + '\Login.ini';

  LIniFile := TIniFile.Create(LCaminho);

  LDatabase := LIniFile.ReadString('Conexao','Database',LDatabase);
  LServidor := LIniFile.ReadString('Conexao', 'Servidor', LServidor);
  LPorta := LIniFile.ReadInteger('Conexao', 'Porta', LPorta);
  LUser_name := LIniFile.ReadString('Conexao', 'Usuario', LUser_name);
  LPassword :=  LIniFile.ReadString('Conexao', 'Senha', LPassword);

  FDconn.Params.Values['Database'] := LDatabase;
  FDconn.Params.Values['Server'] := LServidor;
  FDconn.Params.Values['Password'] := LPassword;
  FDconn.Params.Values['User_name'] := LUser_Name;
  FDconn.Params.Values['Porta'] := LPorta.ToString;

  FDconn.Connected := true;

  finally
  FreeAndNil(LIniFile);

  end;
end;

end.
