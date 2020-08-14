using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class Home : System.Web.UI.Page
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
        fillgrid();
    }

    protected void fillgrid()
    {
        adp=new SqlDataAdapter("select * from studtb",con);
        ds = new DataSet();
        adp.Fill(ds,"studtb");


        if (ds.Tables.Count > 0)
        {
            GridView1.DataSource = ds.Tables[0];
            GridView1.DataBind();
        }
    }

    protected void Button1_Click(object sender, EventArgs e)
    {
        String gen="";
        if (Male.Checked)
        {
            gen = "Male";
        }
        else
        {
            gen = "Female";
        }

        String Hob = "";
        if (Singing.Checked)
        {
            Hob += "Singing" + " ";
        }
        if (Dancing.Checked)
        {
            Hob += "Dancing" + " ";
        }
        if (Reading.Checked)
        {
            Hob += "Reading" + " ";
        }
        cmd = new SqlCommand("insert into studtb(name,pwd,gender,age,phone,hobby,state,city) values('"+ txtnm.Text +"','"+ txtpwd.Text +"','"+ gen +"','" + txtage.Text + "','" + txtphone.Text + "','"+ Hob +"','"+ stcombo.SelectedValue +"','"+ ctcombo.SelectedValue +"')",con);

        
        int row = cmd.ExecuteNonQuery();

        if (row > 0)
        {
            fillgrid();
            clear1();
        }

        
    
    }

    protected void clear1()
    {
        txtid.Text = "";
        txtnm.Text = "";
        txtpwd.Text = "";
        txtcpwd.Text = "";
        txtage.Text = "";
        txtphone.Text = "";

        Male.Checked = false;
        Female.Checked = false;
        Singing.Checked = false;
        Dancing.Checked = false;
        Reading.Checked = false;

        stcombo.SelectedIndex = 0;
        ctcombo.SelectedIndex = 0;
    }


    protected void Button3_Click(object sender, EventArgs e)
    {
        cmd = new SqlCommand("delete from studtb where rno="+ txtid.Text +" ",con);

        int row = cmd.ExecuteNonQuery();

        if (row > 0)
        {
            fillgrid();
            clear1();
        }
    }
   
    protected void stcombo_SelectedIndexChanged(object sender, EventArgs e)
    {
        ctcombo.Items.Clear();

        if (stcombo.SelectedValue.Equals("Gujarat"))
        {
            ctcombo.Items.Add("--Select City--");
            ctcombo.Items.Add("Surat");
            ctcombo.Items.Add("Rajkot");
            ctcombo.Items.Add("Vadodara");
        }
        else if (stcombo.SelectedValue.Equals("Maharashtra"))
        {
            ctcombo.Items.Add("--Select City--");
            ctcombo.Items.Add("Mumbai");
            ctcombo.Items.Add("Pune");
            ctcombo.Items.Add("Nagpur");
        }
        else
        {
            ctcombo.Items.Add("--Select City--");
            ctcombo.Items.Add("Kota");
            ctcombo.Items.Add("Jaipur");
            ctcombo.Items.Add("Udaipur");
        }
    }

    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        clear1();

        txtid.Text = GridView1.SelectedRow.Cells[1].Text;
        txtnm.Text = GridView1.SelectedRow.Cells[2].Text;
        String gen = GridView1.SelectedRow.Cells[4].Text;
        txtpwd.Text = GridView1.SelectedRow.Cells[3].Text;
        txtcpwd.Text = GridView1.SelectedRow.Cells[3].Text;
        if (gen.Equals("Male"))
        {
            Male.Checked = true;
        }
        else
        {
            Female.Checked = true;
        }

        String hob = GridView1.SelectedRow.Cells[7].Text;
        String[] harr = hob.Split(' ');


        for (int i = 0; i < harr.Length; i++)
        {
            if (harr[i].Equals("Dancing"))
            {
                Dancing.Checked = true;
            }
            else if (harr[i].Equals("Singing"))
            {
                Singing.Checked = true;
            }
            else if (harr[i].Equals("Reading"))
            {
                Reading.Checked = true;
            }
        }

        txtage.Text = GridView1.SelectedRow.Cells[5].Text;
        txtphone.Text = GridView1.SelectedRow.Cells[6].Text;
        
        stcombo.SelectedValue = GridView1.SelectedRow.Cells[8].Text;
        ctcombo.SelectedValue = GridView1.SelectedRow.Cells[9].Text;
        
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        

        String gen = "";
        if (Male.Checked)
        {
            gen = "Male";
        }
        else
        {
            gen = "Female";
        }

        String Hob = "";
        if (Singing.Checked)
        {
            Hob += "Singing" + " ";
        }
        if (Dancing.Checked)
        {
            Hob += "Dancing" + " ";
        }
        if (Reading.Checked)
        {
            Hob += "Reading" + " ";
        }
        cmd = new SqlCommand("update studtb set name='" + txtnm.Text + "',pwd='" + txtpwd.Text + "',gender='" + gen + "',age='" + txtage.Text + "',phone='" + txtphone.Text + "',hobby='" + Hob + "',state='" + stcombo.SelectedValue + "',city='" + ctcombo.SelectedValue + "' where rno="+ txtid.Text +" ",con);


        int row = cmd.ExecuteNonQuery();

        if (row > 0)
        {
            fillgrid();
            clear1();
        }

                  
    }
}