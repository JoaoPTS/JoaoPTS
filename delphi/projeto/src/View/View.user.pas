unit View.user;

interface

uses
  Winapi.Windows,
  Winapi.Messages,
  System.SysUtils,
  System.Variants,
  System.Classes,
  Vcl.Graphics,
  Vcl.Controls,
  Vcl.Forms,
  Vcl.Dialogs,
  Vcl.ExtCtrls,
  Vcl.StdCtrls,
  Data.DB,
  Vcl.Grids,
  Vcl.DBGrids,
  Vcl.WinXPanels,
  Service.cadastro, Vcl.Mask, Vcl.DBCtrls;

type
  TViewUser = class(TForm)
    PHeader: TPanel;
    PButtons: TPanel;
    BNovo: TButton;
    BEditar: TButton;
    BExcluir: TButton;
    BSalvar: TButton;
    BCancelar: TButton;
    DBLista: TDBGrid;
    PPesquisa: TPanel;
    LPesquisa: TLabel;
    DSLista: TDataSource;
    CPLista: TCardPanel;
    CLista: TCard;
    CCadastro: TCard;
    BFechar: TButton;
    Panel1: TPanel;
    LUsuario: TLabel;
    LName: TLabel;
    DBEname: TDBEdit;
    LPass: TLabel;
    DBEpass: TDBEdit;
    Label1: TLabel;
    DBid: TDBEdit;
    procedure BFecharClick(Sender: TObject);
    procedure PHeaderMouseDown(Sender: TObject; Button: TMouseButton;
      Shift: TShiftState; X, Y: Integer);
    procedure FormShow(Sender: TObject);
    procedure BEditarClick(Sender: TObject);
    procedure BNovoClick(Sender: TObject);
    procedure BSalvarClick(Sender: TObject);
    procedure BCancelarClick(Sender: TObject);
    procedure BExcluirClick(Sender: TObject);
  private
    { Private declarations }
  public
    procedure GET_Usuario();
  end;

var
  ViewUser: TViewUser;

implementation

{$R *.dfm}

procedure TViewUser.BCancelarClick(Sender: TObject);
begin
  inherited;
  if ServiceCadastro.QRY_user.State in dsEditModes then

  begin
    ServiceCadastro.QRY_user.Cancel;
    CPLista.ActiveCard := CLista;
  end;

end;

procedure TViewUser.BEditarClick(Sender: TObject);
begin
  inherited;
  LUsuario.Caption := 'Editar Usuário';
  CPLista.ActiveCard := CCadastro;
  ServiceCadastro.QRY_user.Edit;
end;

procedure TViewUser.BExcluirClick(Sender: TObject);
begin
if Application.MessageBox('Tem certeza?','Confirmar',mb_yesno + mb_iconquestion) = id_yes then
begin
 if ServiceCadastro.QRY_user.RecordCount > 0 then
 begin
   ServiceCadastro.QRY_user .Delete;
   ShowMessage('Usuário Excluido com Sucesso');

 end;

end;
  ShowMessage('Usuário Não foi Excluido');

end;

procedure TViewUser.BFecharClick(Sender: TObject);
begin
  Self.Close();
end;

procedure TViewUser.BNovoClick(Sender: TObject);
begin
  inherited;
  LUsuario.Caption := 'Novo Usuário';
  CPLista.ActiveCard := CCadastro;
  ServiceCadastro.QRY_user.Insert;
end;

procedure TViewUser.BSalvarClick(Sender: TObject);
begin
  inherited;
  if ServiceCadastro.QRY_user.State in dsEditModes then

  begin
    ServiceCadastro.QRY_user.Post;
    CPLista.ActiveCard := CLista;
    ShowMessage('Usuário Salvo com Sucesso');

  end;

end;

procedure TViewUser.FormShow(Sender: TObject);
begin
  GET_Usuario();
  CPLista.ActiveCard := CLista;
end;

procedure TViewUser.GET_Usuario;
begin
  ServiceCadastro.QRY_User.Close;
  ServiceCadastro.QRY_user.SQL.Clear;
  ServiceCadastro.QRY_user.SQL.Add('select * from "USER"');
  ServiceCadastro.QRY_user.Open();

end;

procedure TViewUser.PHeaderMouseDown(Sender: TObject; Button: TMouseButton;
  Shift: TShiftState; X, Y: Integer);
const
  SC_DRAGMOVE = $F012;

begin

  if Button = mbleft then

    begin
      ReleaseCapture;
      ViewUser.Perform(WM_SYSCOMMAND, SC_DRAGMOVE, 0);

    end;

end;

end.
