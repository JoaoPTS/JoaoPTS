object ViewUser: TViewUser
  Left = 0
  Top = 0
  BorderStyle = bsNone
  Caption = 'ViewUser'
  ClientHeight = 550
  ClientWidth = 1024
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -12
  Font.Name = 'Segoe UI'
  Font.Style = []
  OnShow = FormShow
  TextHeight = 15
  object PHeader: TPanel
    Left = 0
    Top = 0
    Width = 1024
    Height = 105
    Align = alTop
    Alignment = taLeftJustify
    BevelOuter = bvNone
    Caption = 'Usu'#225'rios'
    Color = clGrayText
    Font.Charset = DEFAULT_CHARSET
    Font.Color = clWindowText
    Font.Height = -61
    Font.Name = 'Segoe UI'
    Font.Style = [fsBold]
    ParentBackground = False
    ParentFont = False
    TabOrder = 0
    OnMouseDown = PHeaderMouseDown
    object BFechar: TButton
      Left = 826
      Top = 0
      Width = 198
      Height = 105
      Align = alRight
      Caption = 'Fechar'
      Font.Charset = DEFAULT_CHARSET
      Font.Color = clWindowText
      Font.Height = -47
      Font.Name = 'Segoe UI'
      Font.Style = [fsBold]
      ParentFont = False
      TabOrder = 0
      OnClick = BFecharClick
    end
  end
  object PButtons: TPanel
    Left = 0
    Top = 450
    Width = 1024
    Height = 100
    Align = alBottom
    BevelOuter = bvNone
    Color = clGrayText
    ParentBackground = False
    TabOrder = 1
    object BNovo: TButton
      Left = 274
      Top = 0
      Width = 150
      Height = 100
      Align = alRight
      Caption = 'Novo'
      Font.Charset = DEFAULT_CHARSET
      Font.Color = clWindowText
      Font.Height = -33
      Font.Name = 'Segoe UI'
      Font.Style = [fsBold]
      ParentFont = False
      TabOrder = 0
      OnClick = BNovoClick
    end
    object BEditar: TButton
      Left = 424
      Top = 0
      Width = 150
      Height = 100
      Align = alRight
      Caption = 'Editar'
      Font.Charset = DEFAULT_CHARSET
      Font.Color = clWindowText
      Font.Height = -33
      Font.Name = 'Segoe UI'
      Font.Style = [fsBold]
      ParentFont = False
      TabOrder = 1
      OnClick = BEditarClick
    end
    object BExcluir: TButton
      Left = 574
      Top = 0
      Width = 150
      Height = 100
      Align = alRight
      Caption = 'Excluir'
      Font.Charset = DEFAULT_CHARSET
      Font.Color = clWindowText
      Font.Height = -33
      Font.Name = 'Segoe UI'
      Font.Style = [fsBold]
      ParentFont = False
      TabOrder = 2
      OnClick = BExcluirClick
    end
    object BSalvar: TButton
      Left = 724
      Top = 0
      Width = 150
      Height = 100
      Align = alRight
      Caption = 'Salvar'
      Font.Charset = DEFAULT_CHARSET
      Font.Color = clWindowText
      Font.Height = -33
      Font.Name = 'Segoe UI'
      Font.Style = [fsBold]
      ParentFont = False
      TabOrder = 3
      OnClick = BSalvarClick
    end
    object BCancelar: TButton
      Left = 874
      Top = 0
      Width = 150
      Height = 100
      Align = alRight
      Caption = 'Cancelar'
      Font.Charset = DEFAULT_CHARSET
      Font.Color = clWindowText
      Font.Height = -33
      Font.Name = 'Segoe UI'
      Font.Style = [fsBold]
      ParentFont = False
      TabOrder = 4
      OnClick = BCancelarClick
    end
  end
  object CPLista: TCardPanel
    Left = 0
    Top = 105
    Width = 1024
    Height = 345
    Align = alClient
    ActiveCard = CLista
    BevelOuter = bvNone
    Caption = 'CPLista'
    TabOrder = 2
    object CLista: TCard
      Left = 0
      Top = 0
      Width = 1024
      Height = 345
      Caption = 'car_lista'
      CardIndex = 0
      TabOrder = 0
      object PPesquisa: TPanel
        Left = 0
        Top = 0
        Width = 1024
        Height = 121
        Align = alTop
        TabOrder = 0
        object LPesquisa: TLabel
          Left = 0
          Top = 33
          Width = 92
          Height = 57
          Caption = 'Lista:'
          Font.Charset = DEFAULT_CHARSET
          Font.Color = clWindowText
          Font.Height = -42
          Font.Name = 'Segoe UI'
          Font.Style = []
          ParentFont = False
        end
      end
      object DBLista: TDBGrid
        Left = 0
        Top = 121
        Width = 1024
        Height = 224
        Align = alClient
        BorderStyle = bsNone
        DataSource = DSLista
        Font.Charset = DEFAULT_CHARSET
        Font.Color = clWindowText
        Font.Height = -12
        Font.Name = 'Segoe UI'
        Font.Style = []
        Options = [dgTitles, dgIndicator, dgColumnResize, dgColLines, dgRowLines, dgTabs, dgRowSelect, dgConfirmDelete, dgCancelOnExit, dgTitleClick, dgTitleHotTrack]
        ParentFont = False
        TabOrder = 1
        TitleFont.Charset = DEFAULT_CHARSET
        TitleFont.Color = clWindowText
        TitleFont.Height = -23
        TitleFont.Name = 'Segoe UI'
        TitleFont.Style = []
        Columns = <
          item
            Expanded = False
            FieldName = 'ID'
            Title.Caption = 'C'#243'digo'
            Width = 125
            Visible = True
          end
          item
            Expanded = False
            FieldName = 'NAME'
            Title.Caption = 'Nome'
            Width = 331
            Visible = True
          end
          item
            Expanded = False
            FieldName = 'PASS'
            Title.Caption = 'Senha'
            Width = 306
            Visible = True
          end>
      end
    end
    object CCadastro: TCard
      Left = 0
      Top = 0
      Width = 1024
      Height = 345
      Caption = 'card_cadastro'
      CardIndex = 1
      TabOrder = 1
      object LName: TLabel
        Left = 32
        Top = 136
        Width = 76
        Height = 38
        Caption = 'Nome'
        FocusControl = DBEname
        Font.Charset = DEFAULT_CHARSET
        Font.Color = clWindowText
        Font.Height = -28
        Font.Name = 'Segoe UI'
        Font.Style = []
        ParentFont = False
      end
      object LPass: TLabel
        Left = 32
        Top = 232
        Width = 76
        Height = 38
        Caption = 'Senha'
        FocusControl = DBEpass
        Font.Charset = DEFAULT_CHARSET
        Font.Color = clWindowText
        Font.Height = -28
        Font.Name = 'Segoe UI'
        Font.Style = []
        ParentFont = False
      end
      object Label1: TLabel
        Left = 360
        Top = 127
        Width = 27
        Height = 38
        Caption = 'ID'
        FocusControl = DBid
        Font.Charset = DEFAULT_CHARSET
        Font.Color = clWindowText
        Font.Height = -28
        Font.Name = 'Segoe UI'
        Font.Style = []
        ParentFont = False
      end
      object Panel1: TPanel
        Left = 0
        Top = 0
        Width = 1024
        Height = 121
        Align = alTop
        TabOrder = 0
        object LUsuario: TLabel
          Left = 0
          Top = 33
          Width = 346
          Height = 57
          Caption = 'Cadastro Usu'#225'rios:'
          Font.Charset = DEFAULT_CHARSET
          Font.Color = clWindowText
          Font.Height = -42
          Font.Name = 'Segoe UI'
          Font.Style = []
          ParentFont = False
        end
      end
      object DBEname: TDBEdit
        Left = 32
        Top = 180
        Width = 300
        Height = 39
        DataField = 'NAME'
        DataSource = DSLista
        Font.Charset = DEFAULT_CHARSET
        Font.Color = clWindowText
        Font.Height = -23
        Font.Name = 'Segoe UI'
        Font.Style = []
        ParentFont = False
        TabOrder = 1
      end
      object DBEpass: TDBEdit
        Left = 32
        Top = 280
        Width = 200
        Height = 39
        DataField = 'PASS'
        DataSource = DSLista
        Font.Charset = DEFAULT_CHARSET
        Font.Color = clWindowText
        Font.Height = -23
        Font.Name = 'Segoe UI'
        Font.Style = []
        ParentFont = False
        TabOrder = 2
      end
      object DBid: TDBEdit
        Left = 360
        Top = 180
        Width = 64
        Height = 39
        DataField = 'ID'
        DataSource = DSLista
        Enabled = False
        Font.Charset = DEFAULT_CHARSET
        Font.Color = clWindowText
        Font.Height = -23
        Font.Name = 'Segoe UI'
        Font.Style = []
        ParentFont = False
        TabOrder = 3
      end
    end
  end
  object DSLista: TDataSource
    DataSet = ServiceCadastro.QRY_user
    Left = 1344
    Top = 312
  end
end
