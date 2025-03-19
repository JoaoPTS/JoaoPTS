unit View.principal;

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
  Vcl.StdCtrls,
  Vcl.ExtCtrls,
  View.user;

type
  TViewPrincipal = class(TForm)
    PHeader: TPanel;
    BFechar: TButton;
    PButtons: TPanel;
    BUsuario: TButton;
    procedure BFecharClick(Sender: TObject);
    procedure BUsuarioClick(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  ViewPrincipal: TViewPrincipal;

implementation

{$R *.dfm}

procedure TViewPrincipal.BFecharClick(Sender: TObject);
begin
  Application.Terminate;
end;

procedure TViewPrincipal.BUsuarioClick(Sender: TObject);
begin
  ViewUser := TViewUser.Create(self);
  try
    ViewUser.ShowModal;

  finally
    FreeAndNil(Viewuser);
  end;
end;

end.
