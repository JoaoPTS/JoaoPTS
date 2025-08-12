object ServiceConexao: TServiceConexao
  OnCreate = DataModuleCreate
  Height = 840
  Width = 1120
  object FDConn: TFDConnection
    Params.Strings = (
      'User_Name=SYSDBA'
      'Password=masterkey'
      'Protocol=TCPIP'
      'Server=Localhost'
      'CharacterSet=WIN1252'
      'Port=3050'
      'Database=C:\Temp\projeto\Database\PROJETO.FDB'
      'DriverID=FB')
    Left = 329
    Top = 229
  end
  object WaitCursor: TFDGUIxWaitCursor
    Provider = 'Forms'
    Left = 544
    Top = 224
  end
  object FBDriverLink: TFDPhysFBDriverLink
    Left = 544
    Top = 288
  end
end
