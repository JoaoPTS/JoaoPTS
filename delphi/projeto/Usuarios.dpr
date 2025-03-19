program Usuarios;

uses
  Vcl.Forms,
  Service.conexao in 'src\Service\Service.conexao.pas' {ServiceConexao: TDataModule},
  Service.query in 'src\Service\Service.query.pas' {ServiceQuery: TDataModule},
  View.principal in 'src\View\View.principal.pas' {ViewPrincipal},
  View.user in 'src\View\View.user.pas' {ViewUser};

{$R *.res}

begin
  Application.Initialize;
  Application.MainFormOnTaskbar := True;
  Application.CreateForm(TServiceConexao, ServiceConexao);
  Application.CreateForm(TServiceQuery, ServiceQuery);
  Application.CreateForm(TViewPrincipal, ViewPrincipal);
  Application.CreateForm(TViewUser, ViewUser);
  Application.Run;
end.
