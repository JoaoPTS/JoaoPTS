object ServiceQuery: TServiceQuery
  Height = 1470
  Width = 1960
  PixelsPerInch = 168
  object QRY_user: TFDQuery
    Connection = ServiceConexao.FDConn
    SQL.Strings = (
      'select * from "USER"')
    Left = 272
    Top = 312
    object QRY_userID: TIntegerField
      AutoGenerateValue = arAutoInc
      FieldName = 'ID'
      Origin = 'ID'
      ProviderFlags = [pfInUpdate, pfInWhere, pfInKey]
      Required = True
    end
    object QRY_userNAME: TStringField
      FieldName = 'NAME'
      Origin = 'NAME'
      Size = 120
    end
    object QRY_userPASS: TStringField
      FieldName = 'PASS'
      Origin = 'PASS'
      Size = 50
    end
  end
end
