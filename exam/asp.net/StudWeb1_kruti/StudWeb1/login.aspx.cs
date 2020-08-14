using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class login : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=C:\Users\kruti\OneDrive\Documents\StudDb1.mdf;Integrated Security=True;Connect Timeout=30;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();


    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Broken || con.State == ConnectionState.Closed)
        {
            con.Open();
        }
    }
    protected void Login1_Authenticate(object sender, AuthenticateEventArgs e)
    {
        SqlDataAdapter adp = new SqlDataAdapter("select * from admintb where anm='"+ Login1.UserName +"' and apwd='" + Login1.Password + "' ", con);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables.Count > 0)
        {
            if (ds.Tables[0].Rows.Count > 0)
            {
                Session["new"] = Login1.UserName;
                Response.Write("login successsful");
                Response.Redirect("Home.aspx");
            }
        }
    }
}